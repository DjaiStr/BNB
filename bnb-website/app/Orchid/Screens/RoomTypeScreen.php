<?php
// bewerk functie moet gefixt worden
// afbeeldingen moeten werkend gemaakt worden

namespace App\Orchid\Screens;

use App\Models\RoomType;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class RoomTypeScreen extends Screen
{
    public function name(): ?string
    {
        return 'Manage Room Types';
    }

    public function query(?RoomType $roomType): array
    {
        return [
            'roomType' => $roomType ?? new RoomType(),
            'roomTypes' => RoomType::paginate(10),
        ];
    }

    public function layout(): array
    {
        return [
            Layout::table('roomTypes', [
                TD::make('name', 'Name')
                    ->sort()
                    ->filter(TD::FILTER_TEXT)
                    ->render(fn(RoomType $roomType) => $roomType->name),

                TD::make('description', 'Description')
                    ->render(fn(RoomType $roomType) => $roomType->description),

                TD::make('base_price', 'Base Price')
                    ->render(fn(RoomType $roomType) => '$' . number_format($roomType->base_price, 2)),

                TD::make('room_picture', 'Room Image')
                    ->render(function (RoomType $roomType) {
                        return "<img src='" . asset('storage/room_images/' . $roomType->room_picture) . "' style='width: 100px;height:auto;'>";
                    }),

                TD::make('actions', 'Actions')
                    ->render(function (RoomType $roomType) {
                        return Button::make('Edit')
                            ->icon('pencil')
                            ->method('edit', ['id' => $roomType->id])
                            ->class('btn btn-primary') . ' ' .
                            Button::make('Delete')
                            ->icon('trash')
                            ->method('delete', ['id' => $roomType->id])
                            ->class('btn btn-danger')
                            ->confirm('Are you sure you want to delete this room type?');
                    }),
            ]),

            Layout::rows([
                Input::make('roomType.id')
                    ->type('hidden'),

                Input::make('roomType.name')
                    ->title('Room Type Name')
                    ->value(fn($roomType) => $roomType['name'] ?? null)
                    ->placeholder('Enter room type name')
                    ->required(),

                TextArea::make('roomType.description')
                    ->title('Description')
                    ->rows(3)
                    ->value(fn($roomType) => $roomType['description'] ?? null)
                    ->required(),

                Input::make('roomType.base_price')
                    ->title('Base Price')
                    ->type('number')
                    ->step(0.01)
                    ->value(fn($roomType) => $roomType['base_price'] ?? null)
                    ->placeholder('Enter base price')
                    ->required(),

                Input::make('room_picture')
                    ->title('Upload Image')
                    ->type('file') // Input type for file upload
                    ->value(fn($roomType) => isset($roomType['room_picture']) ? asset('storage/' . $roomType['room_picture']) : null)
                    ->placeholder('Upload a new image')
                    ->required(),

                Button::make('Save Room Type')
                    ->method('save')
                    ->class('btn btn-success'),
            ]),
        ];
    }

    public function save()
    {
        $data = request()->get('roomType');

        if (!$data) {
            Toast::error('No data received.');
            return redirect()->back();
        }

        if (request()->hasFile('room_picture')) {
            $data['room_picture'] = request()->file('room_picture')->store('room_images', 'public');
        }

        if (empty($data['name'])) {
            Toast::error('Name field cannot be empty.');
            return redirect()->back();
        }

        $roomType = RoomType::find($data['id']) ?? new RoomType();
        $roomType->fill($data);
        $roomType->save();

        Toast::success('Room type saved successfully.');
        return redirect()->route('platform.roomType');
    }

    public function edit($id)   
    {
        $roomType = RoomType::findOrFail($id);

        return redirect()->route('platform.roomType', [
            'roomType' => $roomType->id,
        ]);
    }

    public function delete($id)
    {
        $roomType = RoomType::findOrFail($id);
        $roomType->delete();

        Toast::info('Room type deleted successfully.');
        return redirect()->route('platform.roomType');
    }
}

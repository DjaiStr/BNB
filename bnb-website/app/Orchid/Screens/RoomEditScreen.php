<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\TD;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomEditScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'rooms' => Room::with('roomType')->latest()->get(), // Ensure roomType is loaded for the table.
        ];
    }

    /**
     * Create a new room entry.
     *
     * @param Request $request
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'room.room_number' => 'required|max:255',
            'room.room_type_id' => 'required|exists:room_types,id', // Ensure the room type exists.
        ]);

        Room::create($validatedData['room']); // Simplified creation using mass assignment.
    }

    /**
     * Delete a room entry.
     *
     * @param Room $room
     */
    public function delete(Room $room)
    {
        $room->delete();
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Room List';
    }

    /**
     * The description of the screen.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Manage rooms for Het Achterhuys';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Add Room')
                ->modal('roomModal')
                ->method('create')
                ->icon('plus'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::modal('roomModal', Layout::rows([
                Select::make('room.room_type_id')
                    ->fromModel(RoomType::class, 'name')
                    ->title('Room Type')
                    ->required(),
                Input::make('room.room_number')
                    ->title('Room Number')
                    ->placeholder('Enter room number')
                    ->required(),
            ]))
                ->title('Create Room')
                ->applyButton('Add Room'),

            Layout::table('rooms', [
                TD::make('room_number', 'Room Number')
                    ->render(fn(Room $room) => $room->room_number),
                TD::make('roomType.name', 'Room Type')
                    ->render(fn(Room $room) => $room->roomType->name ?? 'N/A'), // Access RoomType relationship.
                TD::make('roomType.description', 'Description')
                    ->render(fn(Room $room) => $room->roomType->description ?? 'N/A'),
                TD::make('roomType.base_price', 'Base Price')
                    ->render(fn(Room $room) => number_format($room->roomType->base_price, 2)),
                TD::make('Actions')
                    ->alignRight()
                    ->render(function (Room $room) {
                        return Button::make('Delete Room')
                            ->confirm('After deleting, the room will be gone forever.')
                            ->method('delete', ['room' => $room->id]);
                    }),
            ]),
        ];
    }
}

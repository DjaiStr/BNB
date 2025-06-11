<?php

namespace App\Orchid\Screens;

use App\Models\Activity;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\TextArea;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class ActivityEditScreen extends Screen
{
    public $name = 'Edit Activity';

    public $description = 'Modify the details of an activity';

    public $activity;

    public function query(Activity $activity): array
    {
        $this->activity = $activity;

        return [
            'activity' => $activity,
        ];
    }

    public function commandBar(): array
    {
        return [
            Button::make('Save')
                ->method('save'),
        ];
    }

    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make('activity.name')
                    ->title('Activity Name')
                    ->required(),

                TextArea::make('activity.description')
                    ->title('Description')
                    ->rows(3)
                    ->required(),

                Input::make('activity.website')
                    ->title('Website URL')
                    ->type('url'),

                Input::make('activity.image')
                    ->placeholder('Enter image URL')
                    ->type('url'),
            ]),
        ];
    }

    public function save(Activity $activity)
    {
        $activity->fill(request()->get('activity'))->save();

        Toast::info('Activity updated successfully.');

        return redirect()->route('platform.activities');
    }
}

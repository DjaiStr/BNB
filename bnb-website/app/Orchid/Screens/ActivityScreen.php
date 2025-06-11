<?php

namespace App\Orchid\Screens;

use App\Models\Activity;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Text;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\TextArea;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Button;
use App\Http\Requests\ActivityRequest;


class ActivityScreen extends Screen
{
    public $name = 'Manage Activities';

    public function query(): array
    {
        return [
            'activities' => Activity::paginate(),
        ];
    }

    public function commandBar(): array
    {
        return [
            Button::make('Create New Activity')
                ->method('createOrUpdate'),
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
                    ->required()
                    ->type('url'),
            ]),

            Layout::table('activities', [
                TD::make('name', 'Name')
                    ->render(function (Activity $activity) {
                        return $activity->name;
                    }),

                TD::make('description', 'Description')
                    ->render(function (Activity $activity) {
                        return $activity->description;
                    }),

                TD::make('website', 'Website')
                    ->render(function (Activity $activity) {
                        return "<a href='{$activity->website}' target='_blank'>{$activity->website}</a>";
                    }),

                TD::make('image', 'Image')
                    ->render(function (Activity $activity) {
                        return "<img src='{$activity->image}' alt='{$activity->name}' style='max-height: 50px;'>";
                    }),

                TD::make('updated_at', 'Last Updated')
                    ->render(function (Activity $activity) {
                        return $activity->updated_at->toDateTimeString();
                    }),

                TD::make('Actions')
                    ->render(function (Activity $activity) {
                        return Link::make('Edit')
                            ->route('platform.activities.edit', $activity);
                    }),
            ]),

        ];
    }


    public function createOrUpdate(Activity $activity)
    {
        $activity->fill(request()->get('activity'))->save();

        Toast::info('Activity saved successfully.');
    }

    public function save(ActivityRequest $request)
    {
        $activity = new Activity();
        $activity->name = $request->name;
        $activity->description = $request->description;
        $activity->website = $request->website;
        $activity->image = $request->image;


        // if ($request->hasFile('image')) {
        //     // Store the image and get its path
        //     $path = $request->file('image')->store('activities', 'public');
        //     $activity->image = $path;
        // }

        $activity->save();

        return redirect()->route('platform.activities');
    }
}

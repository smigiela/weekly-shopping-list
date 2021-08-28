<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePositionRequest;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param StorePositionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function store(StorePositionRequest $request, $shopping_list)
    {
        Position::create($request->validated() + ['shopping_list_id' => $shopping_list]);

        return back(201)->with('message', __('custom.global.messages.successfully_save'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Position $position
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Position $position)
    {
        Position::check_permission($position);

        return view('positions.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StorePositionRequest $request
     * @param Position $position
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StorePositionRequest $request, Position $position)
    {
        Position::check_permission($position);

        $position->update($request->validated());

        return back()->with('message', __('custom.global.messages.successfully_save'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Position $position
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Position $position)
    {
        Position::check_permission($position);

        $position->delete();

        return back()
            ->with(
                'message',
                __('custom.global.messages.successfully_delete')
                . '<a href="'.route('positions.restore', $position->id).'" class="text-red-500 ml-2 md:ml-12">
                    <strong>Ups! Cofnij!</strong>
                    </a>');
    }

    public function restore($position_id)
    {
        $position = Position::withTrashed()->findOrFail($position_id);
        if ($position && $position->trashed()) {
            $position->restore();
        }

        return back()->with('message', __('custom.global.messages.successfully_restore'));
    }

    public function mark_as_done(Position $position)
    {
        Position::check_permission($position);


        /**
         * Tutaj dzieje się chyba rzecz, o którą najbardziej Ci chodziło:
         * zanaczanie jako ukończonych wszystkich pozycji z listy, które należą do "grupy" (np. pomidorów)
         *
         * Zobacz jaki elegancki łańcuszek się robi dzięki prawidłowo zaimplementowanym relacjom:
         *  1) $pozycja odwołuje się do swojej $shoppingListy
         *  2) $shoppingLista odwołuje się do $weeklyShoppingListy, do której należy
         *  3) $weeklyShoppingLista wypluwa wszystkie swoje $pozycje
         *
         * Wystarczy, iterując po wszystkich,
         * sprawdzić, które mają np. taką samą nazwę jak ta podana w argumencie funkcji
         *
         * Tylko, że jak ktoś doda do listy "ogórki", a kto inny "Ogórki", albo "ogurki" to już nie zadziała.
         * Albo trzeba będzie pierdyliard reguł walidacyjnych porobić albo: listę dostępnych produkótw: tak żeby
         * użytkownik nie wpisywał swoich (przynajmniej nie za każdym razem), a wybierał z listy predefiniowanych.
         * Na takiej liście będzie narzucone czy produkt kupujemy "na sztuki", "na wagę", na "na mililitry" etc.
         * No bo ktoś może dopisać do listy 5 ogórków, a drugi 5 kg ogórków i przy sumowaniu wyjdzie kaszana.
         * To takie moje przemyślenia :)
         *
        */
        foreach ($position->shoppingList->weeklyShoppingList->positions as $toBeDone){
            if($position->name == $toBeDone->name) {
                $toBeDone->update(['is_done' => true]);
            }
        }
        return back();
    }

    public function unmark_as_done(Position $position)
    {
        Position::check_permission($position);

        foreach ($position->shoppingList->weeklyShoppingList->positions as $toBeUndone) {
            if($position->name == $toBeUndone->name) {
                $toBeUndone->update(['is_done' => false]);
            }
        }

        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Models\Address;
use App\Models\Person;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peoples = Person::all();
        return view('person.index', compact('peoples'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePersonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersonRequest $request)
    {
        try {
            // トランザクション処理開始
            DB::beginTransaction();

            // $personDataに、リクエストの中から必要なデータを集める
            $personData = $request->only('first_name', 'last_name', 'email_address', 'phone_number', 'birth_date');
            // レコードの挿入処理
            Person::create($personData);

            $addressData = $request->only('country', 'type', 'postal_code', 'state', 'city', 'street_address');
            $addressData['person_id'] = auth()->id();
            Address::create($addressData);

            // トランザクションをコミット
            DB::commit();
        } catch (\Exception $e) {
            // トランザクションをロールバック
            DB::rollBack();
            return redirect()->route('person.error')->with('message', '登録に失敗しました');
        }
        return redirect()->route('person.index')->with('message', '登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = Person::findOrFail($id);
        return view('person.show', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $person = Person::findOrFail($id);
        return view('person.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePersonRequest  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonRequest $request, $id)
    {
        $person = Person::findOrFail($id);
        $person->update($request->all());
        return redirect()->route('person.index')->with('message', '更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = Person::findOrFail($id);
        $person->delete();
        return redirect()->route('person.index')->with('message', '削除しました');
    }
}

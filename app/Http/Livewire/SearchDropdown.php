<?php

namespace App\Http\Livewire;

use App\Models\Experience;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search="";
    public function render() {
        if(strlen($this->search)>=2) {
            $searchResult = DB::table('experiences AS ex')->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('category', 'like', '%' . $this->search . '%')
                ->orWhere('company_name', 'like', '%' . $this->search . '%')
                ->join('users as u','ex.user_id','=','u.id')
                ->orderBy('ex.created_at','DESC')
                ->select('ex.*','u.name')
                ->get();
            return view('livewire.search-dropdown',[
                'searchResult'=>$searchResult
            ]);
        }
        else{
            return view('livewire.search-dropdown');
        }
    }
}

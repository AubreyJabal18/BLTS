<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Document;
use App\Models\Term;
use App\Models\Config;
use App\Traits\Report;

class RedirectController extends Controller
{

    use Report;

    public function redirectToDashboardPage(){
        $config = Config::first();
        if(!$config->first_time){
            return redirect('/');
        }
        return view('dashboard');
    }

    public function redirectToLoginPage(){
        $config = Config::first();
        if(!$config->first_time){
            return redirect('/');
        }
        return view('login');
    }

    public function redirectToHomepage(Request $request){
        $config = Config::first();
        if($config->first_time){
            return redirect('/setup');
        }

        $current_term = Term::find($config->current_term);

        $start = $current_term->start;
        $end = $current_term->end;
        if($request->has('filter')){
            $filter = explode('-', $request->filter);
            $documents = Document::with('authors')->whereBetween('date',[$start, $end])->orderBy($filter[0],$filter[1])->get();
        }
        else{
            $documents = Document::with('authors')->whereBetween('date',[$start, $end])->latest()->get();
        }
        $authors = Author::where('term_id', $current_term->id)->whereNot('position','Secretary')->get();

        $terms = Term::all();

        $authors_names = [];
        foreach($authors as $author){
            array_push($authors_names, $author->name);
        }
        $filters = [
            'administration' => date('Y',strtotime($start)).'-'.date('Y',strtotime($end)),
            'type' => 'Any',
            'area' => 'Any',
            'authors' => 'Any'
        ];
        $this->CreateReport($documents, $filters);

        return view('welcome',[
            'renew' => date('Y-m-d') > $current_term->end ? true : false,
            'current_term' => $current_term,
            'barangay' => $config->barangay,
            'municipality' => $config->municipality,
            'logo' => $config->logo,
            'documents' => $documents,
            'authors' => $authors,
            'terms' => $terms
        ]);
    }

    public function redirectToSetupPage(){
        $config = Config::first();
        if(!$config->first_time){
            flash()->addError("You're successfully registered");
            return redirect('/');
        }
        return view('setup');
    }

    public function redirectToRenewPage(){
        $config = Config::first();
        if($config->first_time){
            flash()->addError('You have to set up an account first!');
            return redirect('/setup');
        }        
        $current_term = Term::find($config->current_term);
        if(date('Y-m-d') < $current_term->end){
            flash()->addError('Administrative Year / Term has not ended yet!');
            return redirect('/');
        }
        return view('renew');
    }

    public function redirectToProfilePage(Request $request){
        $config = Config::first();
        if($config->first_time){
            return redirect('/setup');
        }

        $current_term = Term::find($config->current_term);
        $terms = Term::all();

        if($request->has('id')){
            $term = Term::find($request->id);
            if($term == null){
                flash()->addError('Cannot find term');
                return back();
            }
            $captain = Author::where('term_id',$request->id)->where('position','Captain')->first();
            $secretary = Author::where('term_id',$request->id)->where('position','Secretary')->first();
            $chairman = Author::where('term_id',$request->id)->where('position','SK Chairman')->first();
            $sb_member_1 = Author::where('term_id',$request->id)->where('position','SB Member 1')->first();
            $sb_member_2 = Author::where('term_id',$request->id)->where('position','SB Member 2')->first();
            $sb_member_3 = Author::where('term_id',$request->id)->where('position','SB Member 3')->first();
            $sb_member_4 = Author::where('term_id',$request->id)->where('position','SB Member 4')->first();
            $sb_member_5 = Author::where('term_id',$request->id)->where('position','SB Member 5')->first();
            $sb_member_6 = Author::where('term_id',$request->id)->where('position','SB Member 6')->first();
            $sb_member_7 = Author::where('term_id',$request->id)->where('position','SB Member 7')->first();
        }
        else{
            $config = Config::first();
            $term = Term::where('id', $config->current_term)->first();
            $captain = Author::where('term_id',$config->current_term)->where('position','Captain')->first();
            $secretary = Author::where('term_id',$config->current_term)->where('position','Secretary')->first();
            $chairman = Author::where('term_id',$config->current_term)->where('position','SK Chairman')->first();
            $sb_member_1 = Author::where('term_id',$config->current_term)->where('position','SB Member 1')->first();
            $sb_member_2 = Author::where('term_id',$config->current_term)->where('position','SB Member 2')->first();
            $sb_member_3 = Author::where('term_id',$config->current_term)->where('position','SB Member 3')->first();
            $sb_member_4 = Author::where('term_id',$config->current_term)->where('position','SB Member 4')->first();
            $sb_member_5 = Author::where('term_id',$config->current_term)->where('position','SB Member 5')->first();
            $sb_member_6 = Author::where('term_id',$config->current_term)->where('position','SB Member 6')->first();
            $sb_member_7 = Author::where('term_id',$config->current_term)->where('position','SB Member 7')->first();
        }

        return view('profile',[
            'renew' => date('Y-m-d') > $current_term->end ? true : false,
            'current_term' => $current_term,
            'barangay' => $config->barangay,
            'municipality' => $config->municipality,
            'logo' => $config->logo,
            'term' => $term,
            'terms' => $terms,
            'captain' => $captain,
            'secretary' => $secretary,
            'chairman' => $chairman,
            'sb_member_1' => $sb_member_1,
            'sb_member_2' => $sb_member_2,
            'sb_member_3' => $sb_member_3,
            'sb_member_4' => $sb_member_4,
            'sb_member_5' => $sb_member_5,
            'sb_member_6' => $sb_member_6,
            'sb_member_7' => $sb_member_7
        ]);
    }

    public function redirectToAddProfilePage(){
        $config = Config::first();
        if($config->first_time){
            return redirect('/setup');
        }

        $current_term = Term::find($config->current_term);
        
        $terms = Term::all();
        return view('add_profile',[
            'renew' => date('Y-m-d') > $current_term->end ? true : false,
            'current_term' => $current_term,
            'barangay' => $config->barangay,
            'municipality' => $config->municipality,
            'logo' => $config->logo,
            'terms' => $terms
        ]);
    }

    public function redirectToTrashPage(Request $request){
        $config = Config::first();
        if($config->first_time){
            return redirect('/setup');
        }

        $current_term = Term::find($config->current_term);
        $start = $current_term->start;
        $end = $current_term->end;
        if($request->has('filter')){
            $filter = explode('-', $request->filter);
            $documents = Document::with('authors')->onlyTrashed()->whereBetween('date',[$start, $end])->orderBy($filter[0],$filter[1])->get();
        }
        else{
            $documents = Document::with('authors')->onlyTrashed()->whereBetween('date',[$start, $end])->latest()->get();
        }
        $authors = Author::where('term_id', $current_term->id)->whereNot('position','Secretary')->get();

        $terms = Term::all();

        return view('trash',[
            'renew' => date('Y-m-d') > $current_term->end ? true : false,
            'current_term' => $current_term,
            'barangay' => $config->barangay,
            'municipality' => $config->municipality,
            'logo' => $config->logo,
            'documents' => $documents,
            'authors' => $authors,
            'terms' => $terms
        ]);
    }
    
    public function redirectToAboutPage(){
        return view('about');
    }
}

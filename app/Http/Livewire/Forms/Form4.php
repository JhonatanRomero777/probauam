<?php

namespace App\Http\Livewire\Forms;

use App\Models\Answer;
use App\Models\Choice;
use App\Models\Form;
use App\Models\Sesion;

use Livewire\Component;

class Form4 extends Component
{
    public function mount()
    {
        $this->sesion = new Sesion;
        $this->form = Form::first();
        $this->questions = $this->form->questions;
        $this->idx = 0;
        $this->answers = array();
        $this->answers[$this->idx]["answer"] = -1;
        $this->isCreate = true;
        $this->score = 0;
    }

    protected $listeners = ['create'];

    public function create(Sesion $sesion , Form $form)
    {
        $this->sesion = $sesion;
        $this->form = $form;
        $this->questions = $this->form->questions;
        $this->idx = 0;
        $this->answers = array();
        $this->score = 0;

        if($this->sesion->choices()->where('form_id', '=', $this->form->id)->get()->count())
        {
            $this->isCreate = false;
            foreach($this->questions as $current_question)
            {
                $answer = $this->sesion->choices()->where('question_id', '=', $current_question->id)->first()->answer_id;
                array_push($this->answers , ["question"=>$current_question->id , "answer"=> $answer]);
                $this->score += Answer::find($answer)->score;
            }
        }
        else
        {
            $this->isCreate = true;
            foreach($this->questions as $current_question)
            { array_push($this->answers , ["question"=>$current_question->id , "answer"=> -1]); }
        }

        $this->emit('open-modal','#modal-form'.$this->form->id);
    }

    public function saveOne($question , $answer)
    {
        if($this->answers[$this->idx]["answer"] != -1)
        {$this->score -= Answer::find($this->answers[$this->idx]["answer"])->score;}

        foreach($this->answers as $current_answer)
        {
            if($current_answer["question"] == $question)
            { 
                $this->answers[$this->idx]["answer"] = $answer;
                $this->score += Answer::find($answer)->score;
            }
        }
    }

    public function back()
    { $this->idx--; }

    public function next()
    {
        if($this->answers[$this->idx]["answer"] == -1)
        { $this->addError('answer.required', 'Por favor elige una Respuesta'); }
        else
        { $this->idx++; }
    }

    public function saveAll()
    {
        foreach($this->answers as $current_answer)
        {
            $choice = new Choice;
            $choice->sesion_id = $this->sesion->id;
            $choice->form_id = $this->form->id;
            $choice->question_id = $current_answer["question"];
            $choice->answer_id = $current_answer["answer"];
            $choice->save();
        }

        $cont = 0;
        $forms = Form::all(); 
        foreach($forms as $current_form)
        {
            if($this->sesion->choices()->where('form_id', '=', $current_form->id)->first()){ $cont++; }
        }

        if($cont == count($forms))
        { $this->sesion->finish = true; $this->sesion->save(); }

        $this->emitTo('forms.index','changeState',$this->form->id);
        $this->emit('close-modal','#modal-form'.$this->form->id);
        $this->emit('success');
    }
    
    public function render()
    {
        return view('livewire.forms.form4');
    }
}

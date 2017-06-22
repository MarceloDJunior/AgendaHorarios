<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgendamentosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cliente_id' => 'required',
            'servico_id' => 'required',
            'dia' => 'required|date_format:d/m/Y',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fim' => 'required|date_format:H:i|after:hora_inicio'
        ];
    }

    public function messages()
    {
        return [
            'cliente_id.required' => 'Selecione um cliente',
            'servico_id.required' => 'Selecione um serviço',
            'dia.required' => 'Informe o dia',
            'dia.date_format' => 'Informe uma data válida',
            'hora_inicio.required' => 'Informe o horário do início',
            'hora_inicio.date_format' => 'O formato deve ser HH:mm',
            'hora_fim.required' => 'Informe o horário do fim',
            'hora_fim.date_format' => 'O formato deve ser HH:mm',
            'hora_fim.after' => 'O horário do fim não pode ocorrer antes do horário de inicio'
        ];
    }
}

@extends('layouts.app')
@section('title', 'Kardex')
@section('section', 'Kardex')

@section('content')

		@slot('body')

	 <table class="table table-hover text-left">

      
        <tbody>
    
            <tr>
                <td>Alumno: <strong>Oswaldo Guevara</strong></td>
                <td>No. Control: <strong>9999999</strong></td>
               
            </tr>
            <tr>
                <td>Carrera: <strong> Ing. Informatica</strong><strong></td>
                <td>Fecha: <strong> {{$date}}</strong></td>
               
            </tr>
     
        </tbody>

    </table>	

  @include('tables.kardex-history')
@endsection
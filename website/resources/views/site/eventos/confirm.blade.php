@extends('site.layout')

@section('content')


<p style="padding: 20px">
        <a href="{{route('eventos.show', $evento->id)}}">Voltar</a>
</p>


<div class="row">
	<div class="col-sm-12">
	<h3>Você está confirmando presença no evento {{$evento->name}} em {{$evento->data->format('d/m/Y')}}</h3>
		<hr class="my-4">
		<p>Preencha o formulário abaixo para reserva</p>
	</div>
</div>

<div class="row">
		<div class="col-sm-12">
		<form method="POST" action="{{route('eventos.postConfirm')}}">
			@csrf
		<input type="hidden" name="eventos_id" value="{{$evento->id}}">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="nome">Nome:</label>
							<input required class="form-control" type="text" name="name" id="nome">
							<small id="passwordHelpBlock" class="form-text text-muted">Nome do responsável pela reserva</small>
						</div>
						<div class="form-group col-md-6">
								<label for="email">E-mail:</label>
								<input required class="form-control" type="email" name="email" id="email">
								<small id="passwordHelpBlock" class="form-text text-muted">E-mail do responsável pela reserva</small>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="phone">Telefone:</label>
							<input required class="form-control telefone" type="text" name="phone" id="phone">
							<small id="passwordHelpBlock" class="form-text text-muted">Telefone do responsável pela reserva</small>
						</div>
			
						<div class="form-group col-md-6">
							<label for="number">Quantidade de Pessoas:</label>
							<input required value="1" class="form-control" type="number" name="number" id="number">
							<small id="passwordHelpBlock" class="form-text text-muted">Número de pessoas referente a esta reserva</small>
						</div>

					</div>
					<button class="text-center btn btn-lg btn-block btn-success" type="submit">Fazer reserva</button>
					<a href="{{route('eventos')}}" class="btn btn-danger btn-lg btn-block">Não quero fazer reserva</a>
			</form>
		</div>
	</div>

@endsection


@section('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>

<script type="text/javascript">
$(document).ready( function () {
	$('.telefone').mask('(00) 000000000');
})
</script>

@endsection
<h2>Связаться с нами</h2>
@include('inc.messages')

<form action="{{ route('contact-form') }}" method="post">
	@csrf		
	<div class="form-group">
		<label for="name">Введите имя</label>
		<input type="text" name="name" placeholder="Введите имя" class="form-control" id="name">
	</div><br>
	<div class="form-group">
		<label for="email">Email</label>
		<input type="text" name="email" placeholder="Введите email" class="form-control" id="email">
	</div><br>
	<div class="form-group">
		<label for="subject">Тема сообщения</label>
		<input type="text" name="subject" placeholder="Тема сообщения" class="form-control" id="subject">
	</div><br>
	<div class="form-group">
		<label for="message">Сообщение</label>
		<textarea name="message" placeholder="Введите сообщение" class="form-control" id="message"></textarea>
	</div><br>
	<button type="submit" class="btn btn-success">Отправить</button>
</form>
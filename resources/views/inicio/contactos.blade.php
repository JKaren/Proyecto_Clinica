@extends('index')
@section('logo')
<a href="index.html" id="logo">cience</a>
@stop
@section('articulo')
<article class="pad_left2 col3">
	<h2>Our Contacts</h2>
	<p class="marg_top">
		<strong>Country:</strong>USA<br>
		<strong>State:</strong>California<br>
		<strong>City:</strong>San Diego<br>
		<strong>Telephone:</strong>+354 5635600<br>
		<strong>Email:</strong><a href="mailto:">smartnet@mail.com</a>
	</p>
</article>
@stop
@section('articulo2')
<article class="pad_left1 col2">
		<h2>Miscellaneous Info:</h2>
		<p class="marg_top">Namlibero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudi andae sint et molestiae non recusandae itaque earum rerum hic. Namlibero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo.</p>
</article>
@stop
@section('main')
<div class="main">
	<section id="content">
		<article class="pad_left2">
			<h2>Contact Form</h2>
			<form id="ContactForm" action="">
				<div class="wrapper">
					<div class="wrapper"><p>Your Name:</p><input type="text" class="input" /></div>
					<div class="wrapper"><p>Your E-mail:</p><input type="text" class="input" /></div>
					<div class="wrapper"><p>Your Message:</p><textarea cols="1" rows="1"></textarea></div>
					<div class="wrapper">
						<a href="#" class="link1 right" onClick="document.getElementById('ContactForm').submit()">Send</a>
						<a href="#" class="link1 right" onClick="document.getElementById('ContactForm').reset()">Clear</a>
					</div>
				</div>
			</form>
		</article>
	</section>
</div>

@stop

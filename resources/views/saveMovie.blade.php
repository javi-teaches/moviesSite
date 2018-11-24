<!DOCTYPE html>
<html lang="es" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Save Movie</title>
		<!-- Necesario para poder enviar DATA vía fetch -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
	</head>
	<body>
		<form method="post">
			<div>
				<label>Title</label>
				<input type="text" name="title">
			</div>
			<div>
				<label>Rating</label>
				<input type="text" name="rating">
			</div>
			<div>
				<label>Awards</label>
				<input type="text" name="awards">
			</div>
			<div>
				<label>Release Date</label>
				<input type="date" name="release_date">
			</div>
			<button type="submit">ENVIAR</button>
		</form>

		<script>
			let form = document.querySelector('form');
			// obtenemos la cabecera CSRF
			let header = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

			let inputsArray = Array.from(form.elements);
			inputsArray.pop();

			form.addEventListener('submit', function (e) {
				e.preventDefault();

				let dataMovie = {
					title: inputsArray[0].value,
					rating: inputsArray[1].value,
					awards: inputsArray[2].value,
					release_date: inputsArray[3].value
				};

				let dataToSend = new FormData();
				dataToSend.append('fromJS', JSON.stringify(dataMovie));

				console.log(dataToSend.get('fromJS'));

				window.fetch('http://localhost:8000/apiMoviesPost', {
					method: 'POST',
					body: dataToSend,
					headers: {'X-CSRF-TOKEN': header} // Para enviar data via fetch
				})
					.then(response => response.json())
					.then(rta => console.log(rta))
					.catch(error => console.log(error));
			});
		</script>
	</body>
</html>

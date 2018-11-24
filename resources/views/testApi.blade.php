<!DOCTYPE html>
<html lang="es" dir="ltr">
	<head>
		<meta charset="utf-8">
		{{-- Necesario para poder enviar DATA vía fetch --}}
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Fetch Laravel</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-8">
					<h2>Total de películas: <span>aqui va el # de pelis</span></h2>
					<!-- En este listado se cargarán las películas que vengan de la consulta asíncrona -->
					<ul class="list-group"></ul>
				</div>
				<div class="col-4">
					<h2>Dar de alta una película</h2>
					<form method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Title:</label>
							<input type="text" name="title" class="form-control">
						</div>
						<div class="form-group">
							<label>Rating:</label>
							<input type="text" name="rating" class="form-control">
						</div>
						<div class="form-group">
							<label>Awards:</label>
							<input type="text" name="awards" class="form-control">
						</div>
						<div class="form-group">
							<label>Release date:</label>
							<input type="date" name="release_date" class="form-control">
						</div>
						@csrf
						<button type="submit" class="btn btn-success">ENVIAR</button>
					</form>
				</div>
			</div>
		</div>

		<script>
			let ul = document.querySelector('ul');
			let span = document.querySelector('h2 span');
			let form = document.querySelector('form');
			let contForm = document.querySelector('.col-4');
			let campos = Array.from(form.elements);
			// obtenemos la cabecera CSRF
			let header = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
			campos.pop();

			const ajaxCall = (url, callback, params = null) => {
				window.fetch(url, params)
					.then(response => {
						if (response.status !== 200) console.error(`Problem: ${response.status}`);
						if (params) return response.text();
						else return response.json();
					})
					.then(data => callback(data) || console.log(data))
					.catch(error => console.error(`Error: `, error));
			};

			const getMovies = (data) => {
				const totalMovies = data.length;

				ul.innerHTML = '';
				span.innerText = totalMovies;

				for (let i of data) {
					let id = i.id;
					ul.innerHTML += `
						<li class="list-group-item list-group-item-info">
							<a href="/movies/${id}">${i.title} - ${i.id}</a>
						</li>
					`;
				}
			};

			const setMovie = data => {
				if (data === 'Insertado') {
					contForm.innerHTML += `<div class="alert alert-success">Película insertada exitosamente</div>`;
				}
			};

			ajaxCall('/apiMoviesGet', getMovies);

			setInterval(() => { ajaxCall('/apiMoviesGet', getMovies); }, 1000);

			form.addEventListener('submit', (e) => {
				e.preventDefault();

				let data = {
					title: campos[0].value,
					rating: campos[1].value,
					awards: campos[2].value,
					release_date: campos[3].value
				};

				if (
					data.title === '' ||
					data.rating === '' ||
					data.awards === '' ||
					data.release_date === ''
				) {
					window.alert('Campos vaciós');
				} else {
					const dataToSend = new FormData();
					dataToSend.append('fromJS', JSON.stringify(data));

					ajaxCall('/apiMoviesPost', setMovie, {
						method: 'POST',
						body: dataToSend,
						headers: {'X-CSRF-TOKEN': header} // Para enviar data via fetch
					});
					campos.forEach(campo => { campo.value = ''; });
				}
			});
		</script>
	</body>
</html>

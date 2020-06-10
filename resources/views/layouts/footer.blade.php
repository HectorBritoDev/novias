@yield('aditional_scripts')
@yield('aditional_styles')

@section('footer')

<footer style="background-color: #D7DBDD">

	<div class="container">

		<div class="columns">
			<div class="column is-one-quarter has-text-right">
				<img src="images\eveninte.png">
			</div>
			<div class="column is-one-quarter">

                <style type="text/css">
                    .derechos{
                        width: 100%;
                        height: auto;
                    }
                </style>
				
				<img id="derechos" src="images\derechos.png" href="">

			</div>
			<div class="column is-one-quarter">
				
				<p>Desarrollado por:</p>
				<img src="images\promeddig.png" href="">

			</div>
			<div class="column is-one-quarter">

                <style type="text/css">
                    .contact{
                        width: 15%;
                        height: auto;
                    }
                </style>
       
                <img class="contact" src="images\follows\what.png" href="">
                <img class="contact" src="images\follows\number.png" href="">
                <img class="contact" src="images\follows\email.png" href="">

            </div>
		</div>
		
	</div>

</footer>

@endsection
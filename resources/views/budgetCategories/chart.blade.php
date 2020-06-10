<div id="canvas-holder" style="width:100%">
    <canvas id="chart-area"></canvas>
</div>

<script>
    var randomScalingFactor = function () {
        return Math.round(Math.random() * 100);
    };

    var config = {
        type: 'doughnut',
        data: {
            labels: [
                <?php foreach ($categories as $category) { ?>
                "<?php echo $category->name; ?>",
                <?php } ?>
            ],
            datasets: [{

                data: [
                    <?php foreach ($categories as $category) {
                      if ($category->total_final()>0) {
                      ?>
                    "<?php echo $category->total_final(); ?>",
                    <?php }else{ ?>
                    "<?php echo $category->total_estimated(); ?>",
                    <?php }} ?>

                ],
                backgroundColor: [
                    '#e6194B', '#3cb44b', '#ffe119', '#4363d8', '#f58231', '#911eb4', '#42d4f4',
                    '#f032e6', '#bfef45', '#fabebe', '#469990', '#e6beff', '#9A6324', '#fffac8',
                    '#800000', '#aaffc3', '#808000', '#ffd8b1', '#000075', '#a9a9a9', '#ffffff',
                    '#000000',
                ],

            }]

        },
        options: {
            responsive: true
        }
    };

    window.onload = function () {
        var ctx = document.getElementById('chart-area').getContext('2d');
        window.myPie = new Chart(ctx, config);
    };

</script>


@section('aditional_scripts')
<script src="{{ asset('js/chart.bundle.min.js') }}"></script>

@endsection

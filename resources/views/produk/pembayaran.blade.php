@extends('layouts.navUser')
@section('body')
    <input type="hidden" name="st" id="st" value="{{ $pesanan->snap_token }}">

    <div class="d-flex justify-content-center m-3">
        <div class="col-8 d-flex flex-column align-items-center">
            <div id="snap-container"></div>
            <button id="pay-button" class="btn btn-success">Pay!</button>
        </div>




    </div>


    <!-- @TODO: You can add the desired ID as a reference for the embedId parameter. -->


    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
            // Also, use the embedId that you defined in the div above, here.
            window.snap.embed(document.getElementById('st').value, {
                embedId: 'snap-container'
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
    // Kode yang ingin dijalankan setelah dokumen dimuat
    var payButton = document.getElementById('pay-button').click();
});
    </script>
@endsection

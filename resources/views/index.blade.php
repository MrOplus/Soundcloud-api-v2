
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Soundcloud Link Generator">
    <meta name="author" content="MrOplus">
    <link rel="icon" href="favicon.ico">
    <title>Soundcloud Link Generator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
</head>

<body style="background-color: #f2f2f2;color: #333">

<div class="container">
    <div class="row" style="margin-top: 30vh">
        <div class="col-md-12 text-center" style="font-family: 'Permanent Marker', cursive;font-size: 30px">
            Soundcloud Link Generator
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="margin-top:30px;">
            <form class="row" action="{{url("/")}}/" method="post">
                <div class="col-12 col-sm pr-sm-0">
                    <input type="text" name="url" id="url" placeholder="https://soundcloud.com/user-924418735-266610913/mahv-mishi-daynid-inch" class="form-control">
                </div>
                <div class="col-12 col-sm-auto pl-sm-0">
                    <input type="submit" name="generate" value="Generate" class="btn btn-primary btn-block" />
                </div>
            </form>
        </div>
    </div>
    @if(isset($result))
    <div class="row text-center" style="margin-top: 20px;">
        <div class="col-md-12">
            @if($result['Status'] == 'Success')
                <a href="{{$result['Url']}}" target="_new" class="btn btn-success">Download Now</a>
            @else
                <h5>{{$result['Message']}}</h5>
            @endif

        </div>
    </div>
    @endif
</div>
<footer class="fixed-bottom text-center" style="background-color: #333;color: #fff;padding:10px;">
    <div class="inner">
        <p>Report Bugs to 8ThBiT[@]Programmer[Dot]Net <br> Or <br> <a href="https://twitter.com/MrOplus">twitter.com/MrOplus</a></p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>

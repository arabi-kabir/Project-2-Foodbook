@extends('Layouts.publicView')

@section('title')
    FoodBook
@endsection

@section('findfood')
    id="active"
@endsection

@section('content')
    <div class="card bg-light" id="page-list-table">
      <div class="card-header" id="food-action-byn-group">
        Item Name - {{$food->foodName}}
      </div>
      <div class="card-body row less-padd">
          <table class="table">
            <tbody>
                <tr>
                  <th scope="col">Iten Name</th>
                  <td scope="col">{{$food->foodName}}</td>
                  <td rowspan="4"><img class="card-img-top" id="food_img" src="/upload/food_picture/{{$food->food_img}}" alt="Card image cap"></td>
                </tr>
                <tr>
                  <th scope="col">Category</th>
                  <td scope="col">{{$food->category}}</td>
                </tr>
                <tr>
                  <th scope="col">Price</th>
                  <td scope="col">{{$food->Price}}</td>
                </tr>
                <tr>
                  <th scope="col">Rating</th>
                  <td scope="col">{{$food->rating}}</td>
                </tr>
                <tr>
                  <th scope="col">Description</th>
                  <td scope="col">{{$food->food_discription}}</td>
                </tr>
                <tr>
                  <th scope="col">Availability</th>
                  <td scope="col">{{$food->availability}}</td>
                </tr>
              </tbody>
         </table>
      </div>
    </div>

    <h2 class="font-weight-light" id="review_txt">Reviews</h2>
    <br>
    <table class="table table-bordered">
      <tbody>
        @foreach($foodReview as $review)
            <tr>
              <td> <span class="badge badge-primary">{{$review->reviewer_name}}</span>  {{$review->review}} <p class="badge badge-info">Date : {{$review->date}}</p> </td>
            </tr>
        @endforeach
      </tbody>
    </table>
@endsection

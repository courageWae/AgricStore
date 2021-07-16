<div class="col col-lg-3">
  <div class="card">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
    	<center>
            @if(Auth::user()->photo == null)
             <img src="{{ asset('assets/images/user.png' ) }}" width="60" height="60" style="border-radius: 30px;">
            @else
    		<a href="{{ asset('uploads/pictures/user/'. Auth::user()->photo ) }}" target="blank">
                <img class="card-img-top" src="@{{ asset('uploads/pictures/user/'.Auth::user()->photo ) }}" alt="img" width="60" height="60" style="border-radius: 30px;">
            </a>
            @endif
            <p>
                {{ Auth::user()->name }}<br>
                {{ Auth::user()->email }}<br>
            </p>
    	</center>
    </li>
    <a href="#">
        <li class="list-group-item" style="border-left-color:#f56942;border-left-width:3px;"onMouseOver="this.style.backgroundColor='#cfcbca'" onMouseOut="this.style.backgroundColor=''">
          Summary
        </li>
    </a>
    <a href="#">
        <li class="list-group-item" style="border-left-color:#f56942;border-left-width:3px;"onMouseOver="this.style.backgroundColor='#cfcbca'" onMouseOut="this.style.backgroundColor=''">
          Predictor Results
        </li>
    </a><br>
    <div style="font-weight: bolder;">Profile Details</div>
    <a href="{{ route('user.profile') }}">
        <li class="list-group-item" style="border-left-color:#f56942;border-left-width:3px;"onMouseOver="this.style.backgroundColor='#cfcbca'" onMouseOut="this.style.backgroundColor=''">
          View Profile
        </li>
    </a>
    <a href="{{ route('user.profile.edit')}}">
        <li class="list-group-item" style="border-left-color:#f56942;border-left-width:3px;"onMouseOver="this.style.backgroundColor='#cfcbca'" onMouseOut="this.style.backgroundColor=''">
          Edit Profile
        </li>
    </a><br>
    <div style="font-weight: bolder;">Security Details</div>
    <a href="{{ route('user.password.edit')}}">
        <li class="list-group-item" style="border-left-color:#f56942;border-left-width:3px;"onMouseOver="this.style.backgroundColor='#cfcbca'" onMouseOut="this.style.backgroundColor=''">
          Change Password
        </li>
    </a><br>
    <div style="font-weight: bolder;">Email Details</div>
    <a href="{{ route('user.email.edit')}}">
        <li class="list-group-item" style="border-left-color:#f56942;border-left-width:3px;"onMouseOver="this.style.backgroundColor='#cfcbca'" onMouseOut="this.style.backgroundColor=''">
          Change Email
        </li>
    </a>
    <a href="{{ route('user.email.activate')}}">
        <li class="list-group-item" style="border-left-color:#f56942;border-left-width:3px;"onMouseOver="this.style.backgroundColor='#cfcbca'" onMouseOut="this.style.backgroundColor=''">
          Activate Email
        </li>
    </a><br>
    <li class="list-group-item" style="border-left-color:#f56942;border-left-width:3px;"onMouseOver="this.style.backgroundColor='#cfcbca'" onMouseOut="this.style.backgroundColor=''">
    	<a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">&nbsp&nbsp&nbspLog out
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
  </ul>
</div>
</div>

<form action="{{ route('front.customer.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
  
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
  
    <label for="phone">Phone No:</label>
    <input type="tel" id="phone" name="phone" required>
  
    <label for="billbookphoto">Billbook Photo:</label>
    <input type="file" id="billbookphoto" name="billbookphoto" accept="image/*" required>
  
    <label for="citizenshipfp">Citizenship Frontend Photo:</label>
    <input type="file" id="citizenshipfp" name="citizenshipfp" accept="image/*" required>
  
    <label for="citizenshipbp">Citizenship Back Photo:</label>
    <input type="file" id="citizenshipbp" name="citizenshipbp" accept="image/*" required>
    <input type="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

      @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror 
      <input type="password"placeholder="Retype password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
  
    <button type="submit">Submit</button>
  </form>
  
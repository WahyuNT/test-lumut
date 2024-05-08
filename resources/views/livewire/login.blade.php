<div>
    @include('sweetalert::alert')

    <div class="d-flex justify-content-center gap-3 pt-3 mt-5">
        <div class="col-4 ">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center mb-4">Login Admin</h2>
                    <form action="{{ route('loginAdmin') }}" method="POST">
                        @csrf
                        <span>Username</span>
                        <input name="username" required type="text" class="form-control mb-4"
                            placeholder=" gunakan username dan pass admin atau author">
                        <span>Password</span>
                        <input name="password" required type="password" class="form-control" placeholder="admin atau author">
                        <div class="d-flex justify-content-center">

                            <button type="submit" class="btn btn-primary  mt-3">Login</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>

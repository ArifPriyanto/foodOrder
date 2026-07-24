<nav class="navbar navbar-expand-lg bg-white shadow-sm">

    <div class="container-fluid">

        <span class="navbar-brand fw-bold">

            Dashboard Manager

        </span>

        <div class="dropdown">

            <button
                class="btn btn-light dropdown-toggle"
                data-bs-toggle="dropdown">

                {{ Auth::user()->name }}

            </button>

            <ul class="dropdown-menu dropdown-menu-end">

                <li>

                    <a class="dropdown-item"
                       href="{{ route('profile.edit') }}">

                        Profile

                    </a>

                </li>

                <li>

                    <form method="POST"
                          action="{{ route('logout') }}">

                        @csrf

                        <button class="dropdown-item">

                            Logout

                        </button>

                    </form>

                </li>

            </ul>

        </div>

    </div>

</nav>
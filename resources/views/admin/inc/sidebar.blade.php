<!--- Sidemenu -->
<div id="sidebar-menu">

    <ul class="metismenu" id="side-menu">

        <li class="menu-title">Navigation</li>

        <li>
            <a href="{{ URL::route('dashboard.index') }}">
                <span class="icon"><i class="fas fa-desktop"></i></span>
                <span> Dashboard </span>
            </a>
        </li>

        @can('isAdmin')
        <li>
            <a href="javascript: void(0);">
                <span class="icon"><i class="fas fa-newspaper"></i></span>
                <span> Requests </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="{{ URL::route('article.NewRequest') }}">New</a>
                    <a href="{{ URL::route('article.WorkInProgress') }}">Work In Progress</a>
                    <a href="{{ URL::route('article.PendingAcceptance') }}">Pending Acceptance</a>
                    <a href="{{ URL::route('article.Closed') }}">Closed</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="{{ URL::route('article-category.index') }}">
                <span class="icon"><i class="fas fa-align-justify"></i></span>
                <span> Services </span>
            </a>
        </li>

        <!--li>
            <a href="{{ URL::route('comment.index') }}">
                <span class="icon"><i class="fas fa-comments"></i></span>
                <span> Comments </span>
            </a>
        </li>

        <li>
            <a href="{{ URL::route('requirement.index') }}">
                <span class="icon"><i class="fas fa-chalkboard-teacher"></i></span>
                <span> Requirements </span>
            </a>
        </li-->

        <li>
            <a href="{{ URL::route('reviewer.index') }}">
                <span class="icon"><i class="fas fa-user-tag"></i></span>
                <span> Reviewers </span>
            </a>
        </li>

        <li>
            <a href="{{ URL::route('author.index') }}">
                <span class="icon"><i class="fas fa-user-edit"></i></span>
                <span> Customers </span>
            </a>
        </li>

        <li>
            <a href="{{ URL::route('profile.index') }}">
                <span class="icon"><i class="fas fa-users-cog"></i></span>
                <span> Profile </span>
            </a>
        </li>

        <li>
            <a href="{{ URL::route('setting.index') }}">
                <span class="icon"><i class="fas fa-cog"></i></span>
                <span> Settings </span>
            </a>
        </li>
        @endcan


        @can('isReviewer')
        <li>
            <a href="javascript: void(0);">
                <span class="icon"><i class="fas fa-newspaper"></i></span>
                <span> Requests </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                
                <li>
                    <a href="{{ URL::route('reviewer.article.NewRequest') }}">New</a>
                    <a href="{{ URL::route('reviewer.article.WorkInProgress') }}">Work In Progress</a>
                    <a href="{{ URL::route('reviewer.article.PendingAcceptance') }}">Pending Acceptance</a>
                    <a href="{{ URL::route('reviewer.article.Closed') }}">Closed</a>
                </li>
              
            </ul>
        </li>

        <li>
            <a href="{{ URL::route('reviewer.profile.index') }}">
                <span class="icon"><i class="fas fa-users-cog"></i></span>
                <span> Profile </span>
            </a>
        </li>
        @endcan


        @can('isAuthor')
        <li>
            <a href="{{ URL::route('author.article.index') }}">
                <span class="icon"><i class="fas fa-newspaper"></i></span>
                <span> My Requests </span>
            </a>
        </li>

        <li>
            <a href="{{ URL::route('author.issue.index') }}">
                <span class="icon"><i class="fas fa-question-circle"></i></span>
                <span> Issues </span>
            </a>
        </li>

        <li>
            <a href="{{ URL::route('author.profile.index') }}">
                <span class="icon"><i class="fas fa-users-cog"></i></span>
                <span> Profile </span>
            </a>
        </li>
        @endcan

    </ul>

</div>
<!-- End Sidebar -->
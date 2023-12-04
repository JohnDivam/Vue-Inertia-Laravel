<template>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active">
                        <Link class="nav-link " href="/">Home</Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" href="/quiz">Quiz</Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" href="/questions">Questions</Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
  </header>
</template>

<script>
import {Link} from '@inertiajs/vue3'
export default {
    components:{
        Link
    }
}
</script>

<style>

</style>
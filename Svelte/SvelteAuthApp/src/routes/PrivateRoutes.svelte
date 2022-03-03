<script>
    import { Route } from "svelte-navigator";
    import RouteGuard from "./RouteGuard.svelte";
  
    export let path;
  </script>
  
  <Route {path} let:params let:location let:navigate>
    <RouteGuard>
      <slot {params} {location} {navigate} />
    </RouteGuard>
  </Route>
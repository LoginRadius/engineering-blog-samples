<script>
    import {user} from './stores';

    let _user;
    
    user.subscribe(data=>_user=data)
    const logout=()=>{
        user.set(null);
        localStorage.clear();
    }
   
</script>

{#if user && _user}
    <h3>Welcome {_user?.profile?.FullName}</h3>
	<button on:click={logout}>Logout </button>
{/if}
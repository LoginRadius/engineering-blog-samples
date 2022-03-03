<script>

    import { useNavigate } from "svelte-navigator";
    const navigate = useNavigate();
    
    let email;
    let password;
    let firstName;
    let lastName;
    let loading;

    let signupResponse={
        success:null,
        error:null,
        uid:null,
        id:null,
        fullname:null
    }

    export let sdkoptions;

    const navigateToLogin=()=>navigate('/login');

    const handleSubmit=()=>{
        const signupFields={
            "FirstName": firstName,
            "LastName": lastName,
            "Email": [
                {
                "Type": "Primary",
                "Value": email
                }
            ],
            "Password": password
    }
    loading=true;
    signupResponse={
        success:null,
        error:null,
        uid:null,
        id:null,
        fullname:null
    }
    const endpoint=`https://api.loginradius.com/identity/v2/manage/account?apikey=${sdkoptions.apiKey}&apisecret=${sdkoptions.apiSecret}`;
    fetch(endpoint,
    {
    method:'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body:JSON.stringify(signupFields)
    }).then(response=>response.json())
      .then(data=>{
          if(data.ErrorCode){
              if(data.ErrorCode==936){ 
              signupResponse={
                    ...signupResponse,
                    error:data.Message
                }
             }
            else if(data.ErrorCode==1134){
                signupResponse={
                    ...signupResponse,
                    error:data.Errors[0].ErrorMessage
                }
            }else{
                signupResponse={
                    ...signupResponse,
                    error:data.Description
                }
            }
        }else{
            signupResponse={
                ...signupResponse,
                success:"Account created successfully! Please login via the same details.",
                fullname:data.FullName,
                id:data.id,
                uid:data.Uid
            }
        }
      })
      .catch(error=>console.log(error))
      .finally(()=>loading=false);
}

</script>

<h3>Create a New Account</h3>
<form on:submit|preventDefault={handleSubmit}>
    <input class="form-field" bind:value={firstName} type="text" placeholder="First Name" >
    <input class="form-field" bind:value={lastName} type="text" placeholder="Last Name" >
    <input class="form-field" bind:value={email} type="email" placeholder="Email" >
    <input class="form-field" bind:value={password} type="password" placeholder="Password" >
    <button disabled={loading} class="form-field">
        Signup
    </button>
</form>
{#if signupResponse.error}
	<p class="error">Error ❌ {signupResponse.error}</p>
{/if}
{#if signupResponse.success}
	<p class="success">
        Success ✔
        {signupResponse.success}
    </p>
{/if}
<p>
    Already have an account? 
    <strong class="link" on:click={navigateToLogin}>Login</strong>
</p>

<style>

</style>
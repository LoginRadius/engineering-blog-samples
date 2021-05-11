import React from "react";
import config from "../config.js";

const Logout = () => {
  localStorage.removeItem("token");

  return (
    <div class="container">
      <a
        href={`https://${config.APP_NAME}.hub.loginradius.com/auth.aspx?action=logout&return_url=http://localhost:3000/`}
      >
        <button>Logout</button>
      </a>
    </div>
  );
};
export default Logout;

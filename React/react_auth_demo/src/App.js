import { BrowserRouter as Router, Route, Switch } from "react-router-dom";
import "./App.css";
import LandingPage from "./components/LandingPage";
import Login from "./components/Login";
import Logout from "./components/Logout";

function App() {
  return (
    <Router>
      <div className="App">
        <Switch>
          <Route exact path="/">
            <LandingPage />
          </Route>
          <Route path="/login">
            <div style={{ display: "flex", padding: "1em" }}>
              <Login />
              <Logout />
            </div>
          </Route>
        </Switch>
      </div>
    </Router>
  );
}

export default App;

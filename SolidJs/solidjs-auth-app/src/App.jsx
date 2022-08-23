import logo from './logo.svg';
import styles from './App.module.css';
import { Routes, Route } from "@solidjs/router"
import Home from './components/Home';
import Login from './components/Login';
import Signup from './components/Signup';


function App() {
  return <>
    <Routes>
      <Route path="/" component={Home} />
      <Route path="/login" component={Login} />
      <Route path="/signup" component={Signup} />
    </Routes>
  </>
}

export default App;

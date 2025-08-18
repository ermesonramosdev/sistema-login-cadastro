import { Routes, Route } from "react-router-dom";
import { Login } from "./pages/Login/Login";
import { Register } from "./pages/Register/Register";
import "./global.css";

function App() {

  return (
    <>
      <Routes>
        <Route path="/cadastro" element={<Register />}></Route>
        <Route path="/login" element={<Login />}></Route>
      </Routes>
    </>
    
  )
}

export default App

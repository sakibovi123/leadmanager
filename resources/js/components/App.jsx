import React from "react";
import { Routes, Route } from 'react-router-dom';
import Navbar from "./sections/Navbar";
import Main from "./pages/Main";

const App = () => {
    return (
        <>
           <Routes>
                <Route exact path="/" element={<Main />}></Route>      
           </Routes>
        </>
    )
}

export default App

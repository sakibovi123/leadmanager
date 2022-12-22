import React from "react";
import { Routes, Route } from 'react-router-dom';
import Navbar from "./sections/Navbar";
import Main from "./pages/Main";
import Campaigns from "./pages/Campaigns";

const App = () => {
    return (
        <>
           <Routes>
                <Route exact path="/" element={<Main />}></Route>
                <Route exact path="/campaigns" element={<Campaigns />}></Route>
           </Routes>
        </>
    )
}

export default App

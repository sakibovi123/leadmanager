import React from "react";
import Navbar from "../sections/Navbar";
import Sidebar from "../sections/Sidebar";

const Main = () => {
    return (
        <>
            <Navbar />
            <br /><br /><br />
            <div className="container mx-auto h-[100%] w-[100%] border">
                <Sidebar />

                
            </div>
        </>
    )
}

export default Main
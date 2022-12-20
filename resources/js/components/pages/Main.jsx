import React from "react";
import Navbar from "../sections/Navbar";
import Sidebar from "../sections/Sidebar";
import MainContent from "../MainContent";

const Main = () => {
    return (
        <>
            <Navbar />
            <br /><br /><br />
            <div className="flex container mx-auto w-[100%] border">
                <Sidebar />

                <MainContent />
                

            </div>
        
        </>
    )
}

export default Main
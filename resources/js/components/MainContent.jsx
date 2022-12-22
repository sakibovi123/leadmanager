import React from "react";
import { useEffect } from "react";
import { useState } from "react";
import { format } from "date-fns";


const MainContent = () => {

    let [leads, setLeads] = useState([])

    const url = "https://leadmanager.rayadvertising.com/api/data"

    useEffect(() => {
        fetch(url)
          .then((response) =>            
            (response.json())
          )
          .then((result) => {
            console.log("result => ", result);
            setLeads(result.data);
          })
          .catch((e) => {
            console.log(e);
          });
      }, []);
    

    return (
        <div className="p-5">
            <div className="flex items-center justify-between border border-radius-xl bg-white h-[120px] w-[1400px] rounded">
                <div className="content-1">
                    <div className="flex-col items-center justify-center m-2 border shadow-xl p-5 w-[300px] rounded">
                        <h1 className="text-center font-bold">TOTAL LEADS</h1>
                        <p className="text-center">{leads.length}</p>
                    </div>
                </div>
                <div className="content-1">
                    <div className="flex-col items-center justify-center m-2 border shadow-xl p-5 w-[300px] rounded">
                        <h1 className="text-center">Total Ping</h1>
                        <p className="text-center">233</p>
                    </div>
                </div>
                <div className="content-1">
                    <div className="flex-col items-center justify-center m-2 border shadow-xl p-5 w-[300px] rounded">
                        <h1 className="text-center">Total Ping</h1>
                        <p className="text-center">233</p>
                    </div>
                </div>
                <div className="content-1">
                    <div className="flex-col items-center justify-center m-2 border shadow-xl p-5 w-[300px] rounded">
                        <h1 className="text-center">Total Ping</h1>
                        <p className="text-center">233</p>
                    </div>
                </div>
            </div>
            <br /><br />
            <div className="">
                <table className="w-[1400px] border-2 p-5 table-auto shadow-xl rounded-xl">
                    <thead>
                        <tr className="text-center border-b-2 bg-slate-900 text-white">
                            <th className="text-md p-3">Strike Date</th>
                            <th className="text-md p-3">First Name</th>
                            <th className="text-md p-3">Last Name</th>
                            <th className="text-md p-3">Email</th>
                            <th className="text-md p-3">Phone</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        {
                            leads?
                            leads.map((lead, index) => {
                                    return (
                                        <tr className="bg-white hover:bg-indigo-100 p-3 cursor-pointer transition-all delay-50 ease-in-out hover:translate-x-1 hover:scale-200 border" key={lead.id}>
                                            <td className="text-center p-3">{lead.created_at}</td>
                                            <td className="text-center p-3">{lead.first_name}</td>
                                            <td className="text-center p-3">{lead.last_name}</td>
                                            <td className="text-center p-3">{lead.email}</td>
                                            <td className="text-center p-3">{lead.phone}</td>
                                        </tr>
                                    )
                                }
                            ):
                            <tr><td>Data not found</td></tr>
                  
                        }
                        
                    </tbody>
                  
                </table>
            </div>
            
        </div>
    )

}

export default MainContent
import React from "react";
import { useEffect } from "react";
import { useState } from "react";
import { format } from "date-fns";


const MainContent = () => {

    let [leads, setLeads] = useState([])

    const url = "http://127.0.0.1:8000/api/data"

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
                <div className="content-1">
                    <div className="flex-col items-center justify-center m-2 border shadow-xl p-5 w-[300px] rounded">
                        <h1 className="text-center">Total Ping</h1>
                        <p className="text-center">233</p>
                    </div>
                </div>
            </div>
            <br /><br />
            <div className="bg-white">
                <table className="w-[1400px] border-2 p-4 table-auto">
                    <thead>
                        <tr className="text-center border-b-4">
                            <th className="text-xl p-3">STRIKE DATE</th>
                            <th className="text-xl p-3">FIRST NAME</th>
                            <th className="text-xl p-3">LAST NAME</th>
                            <th className="text-xl p-3">EMAIL</th>
                            <th className="text-xl p-3">PHONE</th>
                        </tr>
                    </thead>
                    <tbody>
                        {
                            leads?
                            leads.map((lead, index) => {
                                    return (
                                        <tr className="hover:bg-gray-100 p-3" key={lead.id}>
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
import React from "react";
import Navbar from "./components/Navbars/AdminNavbar";
import HeaderStats from "./components/Headers/HeaderStats";


const Dashboard = () => {
  return (
    <>
      <div className="md:ml-64  bg-indigo-100   rounded-tr-lg rounded-br-lg">
        <Navbar />
        <HeaderStats />
        <div className="flex flex-wrap justify-center mt-20 pb-20" >
            <div className=" px-4 flex justify-start">
              <div className="relative">
                <img
                  style={{ width: "275px", height: "250px" }}
                  alt="..."
                  src={
                    "https://www.eltiempo.com/files/article_main_1200/uploads/2023/06/30/649eef5c5a7bc.png"
                  }
                  className=" max-w-100 rounded-3xl shadow-xl"
                />
              </div>
            </div>
            <div className="bg-white rounded-3xl shadow-xl">
            <div className=" px-4 text-center mt-1">
              <div className="flex justify-center py-1 lg:pt-4 pt-8">
              </div>
              <div className="text-center mt-1">
                <h3 className="text-xl font-semibold leading-normal text-blueGray-700 mb-1">
                  Mia Kalifa
                </h3>
                <div className="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                  <i className="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>{" "}
                  Riobamba, Ecuador
                </div>
                <div className="mb-2 text-blueGray-600 mt-5">
                  <i className="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>
                  Unidad: Telento Humano
                </div>
                <div className="mb-2 text-blueGray-600 mt-2">
                  <i className="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>
                  Cargo: Jefe de talento humano
                </div>
                <div className="mb-2 text-blueGray-600 mt-2">
                  <i className="fas fa-university mr-2 text-lg text-blueGray-400"></i>
                  Descripcion del cargo
                </div>
              </div>
            </div>
            </div>
          </div>
      </div>
    </>
  );
};



export default Dashboard;

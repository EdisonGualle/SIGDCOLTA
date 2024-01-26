import React from "react";
const NotFound = () => {
  return (
    <>
        <div
          className="relative pt-16 pb-32 flex content-center items-center justify-center h-screen"
          
        >
          <div
            className="absolute top-0 w-full h-full bg-center bg-cover"
            style={{
              backgroundImage:
                "url('https://www.seoptimer.com/storage/images/2014/08/404.png')",
            }}
          >
            <span
              id="blackOverlay"
              className="w-full h-full absolute opacity-75 bg-black"
            ></span>
          </div>
          <div className="container relative mx-auto">
            <div className="items-center flex flex-wrap">
              <div className="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                <div className="pr-12">
                  <h1 className="text-white font-semibold text-5xl">
                    Descubre el encanto de Colta, Ecuador.
                  </h1>
                  <p className="mt-4 text-lg text-gray-300">
                    Colta es un hermoso cantón en Ecuador, conocido por su rica
                    historia y paisajes pintorescos. Explora sus tradiciones
                    culturales y disfruta de la belleza natural que ofrece este
                    maravilloso municipio ecuatoriano.
                  </p>
                </div>
              </div>
            </div>
          </div>

        </div>
    </>
  );
};

export default NotFound;

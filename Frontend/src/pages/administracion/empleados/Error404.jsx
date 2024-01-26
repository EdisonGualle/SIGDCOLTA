import React from 'react';
import { Link } from 'react-router-dom';

const Error404 = () => {
  return (
   <div>
     <div className="text-center">
      <img src="../../public/Error404.svg" alt="Error 404" className=" mt-10 w-100 h-100 mx-auto" />
      <Link to="/" className=" hover:underline mt-10 block">
        Volver a la página de inicio
      </Link>
    </div>
   </div>
  );
};

export default Error404;

// PrivateRoute.jsx
import React, { useContext } from 'react';
import { Route, Navigate } from 'react-router-dom';
import AuthContext from '../../Context/AuthContext';

const PrivateRoute = ({ element, ...rest }) => {
  const authContext = useContext(AuthContext);

  if (!authContext || authContext.isAuthenticated === undefined) {
    // Puedes manejar el caso en que AuthContext no esté definido o no tenga isAuthenticated
    return <Navigate to="/Ingresar" />;
  }

  const { isAuthenticated } = authContext;

  return (
    <Route
      {...rest}
      element={isAuthenticated ? element : <Navigate to="/Ingresar" />}
    />
  );
};

export default PrivateRoute;

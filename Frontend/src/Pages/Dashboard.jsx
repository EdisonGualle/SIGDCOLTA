import React from 'react'
import useAuth from '../hooks/useAuth';
const Dashboard = () => {
    const {auth}=useAuth();
    
    return (<>
        Dashboard
    </>  );
}
 
export default Dashboard;
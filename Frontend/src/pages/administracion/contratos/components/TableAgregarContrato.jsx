import React, { useEffect, useState, useMemo } from "react";
import { AgGridReact } from "ag-grid-react";
import { TRANSLATIONS } from "../../empleados/components/traduccionTableGrid";
import { LANGUAGE_OPTIONS } from "../../empleados/components/traduccionTableGrid";

const TableAgregarContrato = ({ tiposContrato, setSelectedEmployeeId, setSelectedEmployeeName }) => {
  const [rowData, setRowData] = useState([]);
  const [selectedRowCount, setSelectedRowCount] = useState(0);
 
  const handleRowSelection = (event) => {
    const selectedRows = event.api.getSelectedRows();
    if (selectedRows.length > 0) {
      setSelectedEmployeeId(selectedRows[0].idEmpleado);
      const fullName = `${selectedRows[0].primerNombre} ${selectedRows[0].segundoNombre} ${selectedRows[0].primerApellido} ${selectedRows[0].segundoApellido}`;
    setSelectedEmployeeName(fullName);
    } else {
      setSelectedEmployeeId(null);
      setSelectedEmployeeName(null);
    }
    setSelectedRowCount(selectedRows.length);
  };
  
  
  // Column Definitions
  const [colDefs] = useState([
    {
      headerName: "ID", field: "idEmpleado",
      checkboxSelection: true,
      headerCheckboxSelection: true,
      suppressMenu: true,
    },
    { headerName: "Cedula", field: "cedula" },
    {
      headerName: "Nombre Completo", field: "nombreCompleto",
      valueGetter: (params) =>
        `${params.data.primerNombre} ${params.data.segundoNombre} ${params.data.primerApellido} ${params.data.segundoApellido}`,
    },
    { headerName: "Fecha de Nacimiento", field: "fechaNacimiento" },
    { headerName: "Género", field: "genero" },
    { headerName: "Teléfono Personal", field: "telefonoPersonal" },
    { headerName: "Teléfono de Trabajo", field: "telefonoTrabajo" },
    { headerName: "Correo", field: "correo" },
    { headerName: "Etnia", field: "etnia" },
    { headerName: "Estado Civil", field: "estadoCivil" },
    { headerName: "Tipo de Sangre", field: "tipoSangre" },
    { headerName: "Nacionalidad", field: "nacionalidad" },
    { headerName: "ID Provincia", field: "id_provincia" },
    { headerName: "ID Cantón", field: "id_canton" },
    { headerName: "ID Cargo", field: "idCargo" },
    // Agrega más columnas según sea necesario
  ]);

  // Fetch data & update rowData state
  useEffect(() => {
    if (Array.isArray(tiposContrato)) {
      setRowData(tiposContrato);
    }
  }, [tiposContrato]);

  // Apply settings across all columns
  const defaultColDef = useMemo(
    () => ({
      filter: "agTextColumnFilter",
      filterParams: {
        filterOptions: ["contains"],
        defaultFilterOption: "contains",
        suppressAndOrCondition: true,
      },
      floatingFilter: true,
    }),
    []
  );

  return (
    <div className="h-full">
      {selectedRowCount !== 1 && (
        <p className="text-red-500">Seleccione Solo un empleado para agregar un nuevo contrato.</p>
      )}
      <div className={"ag-theme-quartz"} style={{ width: "100%", height: "90%" }}>
        
        <AgGridReact
          localeText={TRANSLATIONS[LANGUAGE_OPTIONS.ES]}
          rowData={rowData}
          columnDefs={colDefs}
          defaultColDef={defaultColDef}
          pagination={true}
          onSelectionChanged={handleRowSelection}
          rowSelection={"multiple"}
        />
      </div>
    </div>
  );
};

export default TableAgregarContrato;

import React, { useEffect, useState, useMemo } from "react";
import { AgGridReact } from "ag-grid-react";
import { TRANSLATIONS } from "../../empleados/components/traduccionTableGrid";
import { LANGUAGE_OPTIONS } from "../../empleados/components/traduccionTableGrid";

const TableAgregarContrato = ({ tiposContrato }) => {
  const [rowData, setRowData] = useState([]);

  // Column Definitions
  const [colDefs] = useState([
    { headerName: "Nombre", field: "nombre" },
    { headerName: "Descripción", field: "descripcion" },
    { headerName: "Clausulas", field: "clausulas" },
    { headerName: "Duración (Meses)", field: "duracionMeses" },
    {
      headerName: "",
      field: "asignar",
      cellRendererFramework: (params) => (
        <button style={{ color: 'white', backgroundColor: 'green' }}>
          Asignar
        </button>
      ),
    },
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
      <div className={"ag-theme-quartz"} style={{ width: "100%", height: "90%" }}>
        <AgGridReact
          localeText={TRANSLATIONS[LANGUAGE_OPTIONS.ES]}
          rowData={rowData}
          columnDefs={colDefs}
          defaultColDef={defaultColDef}
          pagination={true}
        />
      </div>
    </div>
  );
};

export default TableAgregarContrato;

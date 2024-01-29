import "ag-grid-community/styles/ag-grid.css";
import "ag-grid-community/styles/ag-theme-quartz.css";
import { AgGridReact } from "ag-grid-react";
import React, { useEffect, useMemo, useState, useCallback } from "react";
import { TRANSLATIONS } from "../../components/traduccionTableGrid";
import { LANGUAGE_OPTIONS } from "../../components/traduccionTableGrid"
import Tippy from "@tippyjs/react";
import "tippy.js/dist/tippy.css"; // optional

const TableSinEvaluaciones = ({ sinevaluaciones, setSelectedEmployeeId, setSelectedEmployeeName }) => {
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


  // Column Definitions: Defines & controls grid columns.
  const [colDefs] = useState([
    {
      headerName: "ID", field: "idEmpleado",
      checkboxSelection: true,
      headerCheckboxSelection: true,
      suppressMenu: true,
    },
    {
      headerName: "Cédula",
      field: "cedula",
    },
    {
      headerName: "Nombre Completo",
      valueGetter: function (params) {
        return params.data.primerNombre + ' ' +
          params.data.segundoNombre + ' ' +
          params.data.primerApellido + ' ' +
          params.data.segundoApellido;
      },
    },
    { headerName: "Fecha de Nacimiento", field: "fechaNacimiento", },
    { headerName: "Teléfono Personal", field: "telefonoPersonal", },
    { headerName: "Teléfono de Trabajo", field: "telefonoTrabajo", },
    { headerName: "Correo", field: "correo", },
    { headerName: "Tipo de Sangre", field: "tipoSangre", },
    { headerName: "Nacionalidad", field: "nacionalidad", },
    { headerName: "ID Cargo", field: "idCargo", },
  ]);
  // Fetch data & update rowData state
  useEffect(() => {
    if (Array.isArray(sinevaluaciones)) {
      setRowData(sinevaluaciones);
    }
  }, [sinevaluaciones]);

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
          <p className="text-red-500">Seleccione Solo un empleado para Evaluar.</p>
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

export default TableSinEvaluaciones;

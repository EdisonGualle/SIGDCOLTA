const Alerta = ({ alerta }) => {
  return (
    <div
      className={`${
        alerta.error
          ? "from-rose-400 to-rose-600 text-red-400"
          : "from-sky-400 to-sky-600"
      } text-center p-3 rounded-lg uppercase text-red-400 font-bold text-sm my-4 `}
    >
      {alerta.msg}
    </div>
  );
};

export default Alerta;

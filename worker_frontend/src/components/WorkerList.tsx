import { useQuery } from "@tanstack/react-query";

type Worker = {
  id: number;
  department_id: number;
  name: string;
  city: string;
  email: string;
  picture: string;
  department: {
    id: number;
    name: string;
  };
};

export default function WorkerList() {
  const { data: workers, error, isLoading } = useQuery<Worker[]>({
    queryKey: ["workers"],
    queryFn: async () => {
      const res = await fetch("/api/workers");
      if (!res.ok) {
        throw new Error("Failed to fetch workers");
      }
      const workers = await res.json();
      return workers as Worker[];
    },
  });

  if (error) {
    return <div className="text-red-500 text-center mt-4">Error: {error.message}</div>;
  }

  return (
    <main className="flex min-h-screen flex-col items-center justify-between p-6 bg-gray-100">
      <h1 className="text-2xl font-bold mb-6">Worker List</h1>
      {isLoading ? (
        <div className="text-blue-500 text-xl">Loading...</div>
      ) : (
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-5xl">
          {workers?.map((worker) => (
            <div
              key={worker.id}
              className="bg-white shadow-md rounded-lg p-4 flex flex-col items-center text-center hover:shadow-lg transition-shadow"
            >
              <img
                src={worker.picture}
                alt={worker.name}
                className="w-24 h-24 rounded-full mb-4 object-cover"
              />
              <h2 className="text-lg font-semibold">{worker.name}</h2>
              <p className="text-gray-600">{worker.city}</p>
              <p className="text-gray-500 text-sm">{worker.email}</p>
              <span className="mt-2 px-3 py-1 bg-blue-100 text-blue-600 text-xs rounded-full">
                {worker.department.name}
              </span>
            </div>
          ))}
        </div>
      )}
    </main>
  );
}
@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Doctor Profile: {{ $doctor->name }}</h1>
    <div>
        <a href="{{ route('admin.doctors.index') }}" class="btn btn-secondary me-2">
            <i class="fas fa-arrow-left"></i> Back to Doctors
        </a>
        <a href="{{ route('admin.doctors.edit', $doctor) }}" class="btn btn-warning me-2">
            <i class="fas fa-edit"></i> Edit Doctor
        </a>
        <form action="{{ route('admin.doctors.destroy', $doctor) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure? This will delete all associated patients and appointments.')">
                <i class="fas fa-trash"></i> Delete Doctor
            </button>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-header bg-light">
                <h5 class="card-title mb-0"><i class="fas fa-user-md"></i> Doctor Information</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th>Name:</th>
                            <td>{{ $doctor->name }}</td>
                        </tr>
                        <tr>
                            <th>Specialization:</th>
                            <td><span class="badge bg-info text-dark fs-6">{{ $doctor->specialization ?? 'General' }}</span></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><a href="mailto:{{ $doctor->email }}">{{ $doctor->email }}</a></td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td><a href="tel:{{ $doctor->phone }}">{{ $doctor->phone ?? 'N/A' }}</a></td>
                        </tr>
                        <tr>
                            <th>Joined:</th>
                            <td>{{ $doctor->created_at->format('M d, Y') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-8 mb-4">
        <div class="card h-100">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0"><i class="fas fa-calendar-check"></i> Recent Appointments</h5>
                <span class="badge bg-primary">{{ $appointments->count() }} Recent</span>
            </div>
            <div class="card-body">
                @if($appointments->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Patient</th>
                                    <th>Date & Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->patient->name }}</td>
                                    <td>{{ $appointment->appointment_date->format('M d, Y - H:i A') }}</td>
                                    <td>
                                        @if($appointment->status === 'scheduled')
                                            <span class="badge bg-warning">Scheduled</span>
                                        @elseif($appointment->status === 'completed')
                                            <span class="badge bg-success">Completed</span>
                                        @else
                                            <span class="badge bg-danger">Cancelled</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('appointments.show', $appointment) }}" class="btn btn-sm btn-outline-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-muted mb-0">No appointments scheduled for this doctor yet.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header bg-light d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0"><i class="fas fa-users"></i> Assigned Patients</h5>
        <span class="badge bg-success">{{ $patients->total() }} Total Patients</span>
    </div>
    <div class="card-body">
        @if($patients->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patients as $patient)
                        <tr>
                            <td>{{ $patient->name }}</td>
                            <td>{{ $patient->email }}</td>
                            <td>{{ $patient->phone }}</td>
                            <td>{{ $patient->date_of_birth->age }} yrs</td>
                            <td>{{ ucfirst($patient->gender) }}</td>
                            <td>
                                <a href="{{ route('patients.show', $patient) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('patients.edit', $patient) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $patients->links() }}
            </div>
        @else
            <p class="text-muted mb-0">No patients assigned to this doctor yet.</p>
        @endif
    </div>
</div>
@endsection

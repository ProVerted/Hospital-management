@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Appointment Details #{{ $appointment->id }}</h1>
    <div>
        <a href="{{ route('appointments.index') }}" class="btn btn-secondary me-2">
            <i class="fas fa-arrow-left"></i> Back to Appointments
        </a>
        <a href="{{ route('appointments.edit', $appointment) }}" class="btn btn-warning me-2">
            <i class="fas fa-edit"></i> Edit Appointment
        </a>
        <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this appointment?')">
                <i class="fas fa-trash"></i> Cancel / Delete
            </button>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header bg-light">
                <h5 class="card-title mb-0"><i class="fas fa-calendar-alt"></i> Appointment Summary</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th style="width: 40%;">Scheduled Date & Time:</th>
                            <td><strong>{{ $appointment->appointment_date->format('l, F j, Y - g:i A') }}</strong></td>
                        </tr>
                        <tr>
                            <th>Status:</th>
                            <td>
                                @if($appointment->status === 'scheduled')
                                    <span class="badge bg-warning text-dark fs-6">Scheduled</span>
                                @elseif($appointment->status === 'completed')
                                    <span class="badge bg-success fs-6">Completed</span>
                                @else
                                    <span class="badge bg-danger fs-6">Cancelled</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Created On:</th>
                            <td>{{ $appointment->created_at->format('M d, Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Last Updated:</th>
                            <td>{{ $appointment->updated_at->format('M d, Y H:i') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header bg-light">
                <h5 class="card-title mb-0"><i class="fas fa-comment-medical"></i> Clinical Notes</h5>
            </div>
            <div class="card-body">
                @if($appointment->notes)
                    <p class="card-text text-dark" style="white-space: pre-line;">{{ $appointment->notes }}</p>
                @else
                    <p class="text-muted">No notes provided for this appointment.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0"><i class="fas fa-user-injured"></i> Patient Details</h5>
                <a href="{{ route('patients.show', $appointment->patient) }}" class="btn btn-sm btn-outline-primary">View Full Profile</a>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th style="width: 35%;">Name:</th>
                            <td>{{ $appointment->patient->name }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $appointment->patient->email }}</td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td>{{ $appointment->patient->phone }}</td>
                        </tr>
                        <tr>
                            <th>Gender / Age:</th>
                            <td>{{ ucfirst($appointment->patient->gender) }} ({{ $appointment->patient->date_of_birth ? $appointment->patient->date_of_birth->age : 'N/A' }} yrs)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header bg-light">
                <h5 class="card-title mb-0"><i class="fas fa-user-md"></i> Assigned Doctor</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th style="width: 35%;">Doctor Name:</th>
                            <td><strong>{{ $appointment->doctor->name }}</strong></td>
                        </tr>
                        <tr>
                            <th>Specialization:</th>
                            <td><span class="badge bg-info text-dark">{{ $appointment->doctor->specialization ?? 'General Practice' }}</span></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $appointment->doctor->email }}</td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td>{{ $appointment->doctor->phone ?? 'N/A' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

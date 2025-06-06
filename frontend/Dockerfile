# Stage 1: Build the application
FROM node:20-alpine AS builder

# Set working directory
WORKDIR /app

# Install dependencies
COPY package*.json ./
RUN npm install

# Copy application files
COPY . .

# Build the app
RUN npm run build

# Stage 2: Run the built application with a minimal image
FROM node:20-alpine

WORKDIR /app

# Install production dependencies only
COPY package*.json ./
RUN npm install --omit=dev

# Copy built files from builder
COPY --from=builder /app/.output .output

# Expose port (Nuxt default)
EXPOSE 3000

# Start the app
CMD ["node", ".output/server/index.mjs"]

/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_window.c                                        :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/11/29 13:27:33 by shcohen           #+#    #+#             */
/*   Updated: 2018/12/03 14:46:22 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fdf.h"

int     ft_create_window(int x, int y)
{
	void	*mlx_ptr;
	void	*win_ptr;

	x = 250;
	y = 250;
	mlx_ptr = mlx_init();
	win_ptr = mlx_new_window(mlx_ptr, 500, 500, "fdf");
	while (y < 260)
	{
		while (x < 260)
		{
			mlx_pixel_put(mlx_ptr, win_ptr, x, y, 0xFFFFFF);
			x++;
		}
		x = 250;
		y++;
	}
	mlx_loop(mlx_ptr);
    return (0);
}